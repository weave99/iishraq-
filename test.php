<?php
include_once("include/conn.php");
?>
                
                 
                  
                <?php 
                 $p="select *  from customer_order where order_id=(select max(order_id) from customer_order)";
                 $m_order_id=0;       
               //$q=mysqli_query($conn,$p);
               $result = $conn->query($p);
               if($result->num_rows > 0) 
                  {
                   $row = $result -> fetch_array(MYSQLI_ASSOC);
                   $m_user_id=$row['user_id'];
                   $m_order_id=$row['order_id'];
                   //$m_trans_date=date('d-m-Y');
                   $query2=$conn->query("update customer_order set txn_status='PAID' where order_id=$m_order_id");
                   //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`, `color`SELECT * FROM `cart_details` WHERE 1
                   $query3=$conn->query("select * from  cart_details where user_id=$m_user_id");
                   while($prd=$query3 -> fetch_array(MYSQLI_ASSOC)) 
                             {
                              $cart_id1=$prd['cart_id'];
                              $prod_id1=$prd['prod_id'];
                              $unit_price1=$prd['unit_price'];
                              $qty1=$prd['qty'];
                              $color1=$prd['color'];
   
                              $query4=$conn->query("insert into  customer_order_details (order_id,prod_id,unit_price,qty,color) values ($m_order_id, $prod_id1, '$unit_price1', '$qty1', '$color1')");
                              //`id`, `order_id`, `prod_id`, `unit_price`, `qty`, `color`SELECT * FROM `customer_order_details` WHERE 1
                             }
   
                  }
   

                  echo "<table><tr><td style='background-color: darkseagreen;color: aliceblue;'> Success";
            
                  echo "<form method='post' action='../billdownload.php'>";
                  echo '<input type="text" name="x" value="'.$m_order_id.'">';
                  echo '<input type="submit" name="Download" value="Print Your Invoice">';
                  echo "<form></td></tr></table>";
                  ?>
