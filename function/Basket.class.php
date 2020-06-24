<?php 
// Start session 
if(!session_id()){ 
    session_start(); 
} 
 
/** 
 * Shopping basket Class 
 * 
 * @package        PHP Library 
 * @category    Shopping basket 
 * @author        CodexWorld Dev Team 
 * @link        https://www.codexworld.com 
 */ 
class basket { 
    protected $basket_contents = array(); 
     
    public function __construct(){ 
        // get the shopping basket array from the session 
        $this->basket_contents = !empty($_SESSION['basket_contents'])?$_SESSION['basket_contents']:NULL; 
        if ($this->basket_contents === NULL){ 
            // set some base values 
            $this->basket_contents = array('basket_total' => 0, 'total_items' => 0); 
        } 
    } 
     
    /** 
     * basket Contents: Returns the entire basket array 
     * @param    bool 
     * @return    array 
     */ 
    public function contents(){ 
        // rearrange the newest first 
        $basket = array_reverse($this->basket_contents); 
 
        // remove these so they don't create a problem when showing the basket table 
        unset($basket['total_items']); 
        unset($basket['basket_total']); 
 
        return $basket; 
    } 
     
    /** 
     * Get basket item: Returns a specific basket item details 
     * @param    string    $row_id 
     * @return    array 
     */ 
    public function get_item($row_id){ 
        return (in_array($row_id, array('total_items', 'basket_total'), TRUE) OR ! isset($this->basket_contents[$row_id])) 
            ? FALSE 
            : $this->basket_contents[$row_id]; 
    } 
     
    /** 
     * Total Items: Returns the total item count 
     * @return    int 
     */ 
    public function total_items(){ 
        return $this->basket_contents['total_items']; 
    } 
     
    /** 
     * basket Total: Returns the total price 
     * @return    int 
     */ 
    public function total(){ 
        return $this->basket_contents['basket_total']; 
    } 
     
    /** 
     * Insert items into the basket and save it to the session 
     * @param    array 
     * @return    bool 
     */ 
    public function insert($item = array()){ 
        if(!is_array($item) OR count($item) === 0){ 
            return FALSE; 
        }else{ 
            if(!isset($item['s_id'], $item['s_name'], $item['s_cost'], $item['s_img'], $item['s_description'])){ 
                return FALSE; 
            }else{ 
                /* 
                 * Insert Item 
                 */ 
                // prep the quantity 
                $item['s_amount'] = (float) $item['s_amount']; 
                if($item['s_amount'] == 0){ 
                    return FALSE; 
                } 
                // prep the price 
                $item['s_cost'] = (float) $item['s_cost']; 

                // create a unique identifier for the item being inserted into the basket 
                $rowid = md5($item['s_id']); 

                // get quantity if it's already there and add it on 
                $old_s_amount = isset($this->basket_contents[$rowid]['s_amount']) ? (int) $this->basket_contents[$rowid]['s_amount'] : 0; 
                
                // re-create the entry with unique identifier and updated quantity 
                $item['rowid'] = $rowid; 
                $item['s_amount'] += $old_s_amount; 
                $this->basket_contents[$rowid] = $item; 
                 
                // save basket Item 
                if($this->save_basket()){ 
                    return isset($rowid) ? $rowid : TRUE; 
                }else{ 
                    return FALSE; 
                } 
            } 
        } 
    } 
     
    /** 
     * Update the basket 
     * @param    array 
     * @return    bool 
     */ 
    public function update($item = array()){ 
        if (!is_array($item) OR count($item) === 0){ 
            return FALSE; 
        }else{ 
            if (!isset($item['rowid'], $this->basket_contents[$item['rowid']])){ 
                return FALSE; 
            }else{ 
                // prep the quantity 
                if(isset($item['s_amount'])){ 
                    $item['s_amount'] = (float) $item['s_amount']; 
                    // remove the item from the basket, if quantity is zero 
                    if ($item['s_amount'] == 0){ 
                        unset($this->basket_contents[$item['rowid']]); 
                        return TRUE; 
                    } 
                } 
                 
                // find updatable keys 
                $keys = array_intersect(array_keys($this->basket_contents[$item['rowid']]), array_keys($item)); 
                // prep the price 
                if(isset($item['s_cost'])){ 
                    $item['s_cost'] = (float) $item['s_cost']; 
                } 
                // product id & name shouldn't be changed 
                foreach(array_diff($keys, array('s_id', 's_name' , 's_img')) as $key){ 
                    $this->basket_contents[$item['rowid']][$key] = $item[$key]; 
                } 
                // save basket data 
                $this->save_basket(); 
                return TRUE; 
            } 
        } 
    } 
     
    /** 
     * Save the basket array to the session 
     * @return    bool 
     */ 
    protected function save_basket(){ 
        $this->basket_contents['total_items'] = $this->basket_contents['basket_total'] = 0; 
        foreach ($this->basket_contents as $key => $val){ 
            // make sure the array contains the proper indexes 
            if(!is_array($val) OR !isset($val['s_cost'], $val['s_amount'])){ 
                continue; 
            } 
      
            $this->basket_contents['basket_total'] += ($val['s_cost'] * $val['s_amount']); 
            $this->basket_contents['total_items'] += $val['s_amount']; 
            $this->basket_contents[$key]['subtotal'] = ($this->basket_contents[$key]['s_cost'] * $this->basket_contents[$key]['s_amount']); 
        } 
         
        // if basket empty, delete it from the session 
        if(count($this->basket_contents) <= 2){ 
            unset($_SESSION['basket_contents']); 
            return FALSE; 
        }else{ 
            $_SESSION['basket_contents'] = $this->basket_contents; 
            return TRUE; 
        } 
    } 
     
    /** 
     * Remove Item: Removes an item from the basket 
     * @param    int 
     * @return    bool 
     */ 
     public function remove($row_id){ 
        // unset & save 
        unset($this->basket_contents[$row_id]); 
        $this->save_basket(); 
        return TRUE; 
     } 
      
    /** 
     * Destroy the basket: Empties the basket and destroy the session 
     * @return    void 
     */ 
    public function destroy(){ 
        $this->basket_contents = array('basket_total' => 0, 'total_items' => 0); 
        unset($_SESSION['basket_contents']); 
    } 
}