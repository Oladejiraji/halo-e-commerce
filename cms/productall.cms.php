<?php
    require 'header.cms.php';
    include '../include/dbh.inc.php';
?>

<section id="welcome">
        <h1>All Products</h1>

        <div id="search-bar">
            <form action="" Method="POST" id="search-form">
                <input type="text" name="" id="" Placeholder="Search Product Name...">
                <ul id="data-viewer"></ul>
            </form>
        </div>


        <?php
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            } 

            $sql = 'SELECT * FROM products;';
            $result = mysqli_query($conn, $sql);
            $numberOfResults = mysqli_num_rows($result);
            $resultsPerPage = 5;
            $numberOfPages =  ceil($numberOfResults/$resultsPerPage);
            $thisPageFirstResult = ($page-1)*$resultsPerPage;

        ?>

        <table id="product-table">
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
            </tr>
            <?php
                 $sql = 'SELECT * FROM products LIMIT ' . $thisPageFirstResult. ',' .$resultsPerPage ;
                 $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td class=''>".$row['productname']."</td>
                        <td><p class=''>".$row['productlowprice']."</p><a href='productadd.cms.php?key=".$row['productid']."'>Edit</a><a href='productview.cms.php?key=".$row['productid']."'>View</a><a href='../include/deleteproduct.inc.php?key=".$row['productid']."'>Delete</a></td>
                    </tr>";
                }
            ?>
           
        </table>
        <div id="page-no">
        <?php
             if (!isset($_GET['page'])) {
                $ide = 1;
            } else {
                $ide = $_GET['page'];
            } 
            $next = $ide+1;
            $prev = $ide-1;
            if ($prev != 0) {
                echo '<a href="productall.cms.php?page='.$prev.'"><i class="fas fa-chevron-left"></i></a>';
            }

            for ($page=1; $page <= $numberOfPages; $page++) { 
                echo '<a href="productall.cms.php?page='.$page.'"> ' . $page . ' </a>';
            }

            if (!($next > $numberOfPages)) {
                echo '<a href="productall.cms.php?page='.$next.'"><i class="fas fa-chevron-right"></i></a>';
            
            }
          
            


        ?>
        </div>
    </section>

    <script src="../js/searchFormCms.js"></script>
    <script src="../js/navCms.js"></script>
</body>

</html>