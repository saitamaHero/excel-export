<?php
    $action = $_GET['action'] ?? null;

?>

<?php if($action === "upload"): ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="template">Upload Template:</label> 
            <input type="file" name="file" id="template"/>
        </div>

        <button>Upload</button>
    </form>
<?php elseif($action === "new"): ?>   
    <form action="do.php" method="POST">
        <div>
            <label for="price">Price:</label> 
            <input id="price" type="number" name="price"/>
        </div>
        <div>         
            <p> Taxes Include in price?</p>   
            <label>                
                <input type="radio" name="include_tax" value="1"/>
                Yes
            </label> 
            <label>                
                <input type="radio" name="include_tax" value="0"/>
                No
            </label> 
            
        </div>

        <button>Generate Excel</button>
    </form>
<?php else: ?>
    <h3>What do you want to do?</h3>
    <ol>
        <li><a href="?action=new">Fill Form</a></li>
        <li><a href="?action=upload">Upload Template</a></li>
    </ol>
<?php endif; ?>


