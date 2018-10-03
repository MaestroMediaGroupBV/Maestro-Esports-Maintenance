<?php




function insert_categories() {
    
    global $connection;
    
    if(isset($_POST['submit'])) {
        
    $cat_title = $_POST['cat_title'];
        
    
        if($cat_title == "" || empty($cat_title)) {
            
            echo "This field should not be empty";
                
            
        } else {
            
            //insere na tabela da BD
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            
            $create_category_query = mysqli_query($connection, $query);
            if(!$create_category_query) {
                
                //se a query falhar função morre
                die('QUERY FAILED' . mysqli_error($connection));    
                
                
            }
        }
        
        
    }
    
}


function findAllCategories() {
    
    global $connection;
    
    //find all categories query

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);
                                
while($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";

}

}


function deleteCategories() {
    global $connection;
    
    
    if(isset($_GET['delete'])) {
    
    $the_cat_id = $_GET['delete'];
    
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: categories.php");

}
    
    
    
    
    
    
}


?>


<?php

///////////////////////////// fornecedores //////////////////////////

function insert_fornecedores() {
    
    global $connection;
    
    if(isset($_POST['submit'])) {
        
    $forn_name = $_POST['forn_name'];
    $forn_number = $_POST['forn_number'];
    $forn_email = $_POST['forn_email'];
    $forn_address = $_POST['forn_address'];
    $forn_zip = $_POST['forn_zip'];
    $forn_local = $_POST['forn_local'];
    $forn_phone = $_POST['forn_phone'];
    $forn_nif = $_POST['forn_nif'];
    
        
    $verification['forn_name'] 	= $forn_name;
    $verification['forn_number'] 	= $forn_number;
    $verification['forn_email']	= $forn_email;
    $verification['forn_address']	= $forn_address;
    $verification['forn_zip'] 	= $forn_zip;
    $verification['forn_local'] 	= $forn_local;
    $verification['forn_phone'] 	= $forn_phone;
    $verification['forn_nif'] 	= $forn_nif;

        if(in_array('',$verification)){
            echo "Existem campos de preenchimento obrigatório não preenchidos. Verifique os dados inseridos.";
        }else{
            //insere na tabela da BD
                    $query = "INSERT INTO fornecedores(forn_name, forn_number, forn_email, forn_address, forn_zip, forn_local, forn_phone, forn_nif)";
                    $query .= "VALUE('$verification[forn_name]', '$verification[forn_number]', '$verification[forn_email]', '$verification[forn_address]', '$verification[forn_zip]', '$verification[forn_local]', '$verification[forn_phone]', '$verification[forn_nif]')";

                    $create_fornecedores_query = mysqli_query($connection, $query);
                    if(!$create_fornecedores_query) {

                        //se a query falhar função morre
                        die('QUERY FAILED' . mysqli_error($connection));    


                    }
        }
        
    }
    
}


function findAllFornecedores() {
    
    global $connection;
    
    //find all categories query

$query = "SELECT * FROM fornecedores";
$select_fornecedores = mysqli_query($connection, $query);
                                
while($row = mysqli_fetch_assoc($select_fornecedores)) {
$forn_id = $row['forn_id'];
$forn_name = $row['forn_name'];
$forn_number = $row['forn_number'];
$forn_email = $row['forn_email'];
$forn_address = $row['forn_address'];
$forn_zip = $row['forn_zip'];
$forn_local = $row['forn_local'];
$forn_phone = $row['forn_phone'];
$forn_nif = $row['forn_nif'];

echo "<tr>";
echo "<td>{$forn_id}</td>";
echo "<td>{$forn_name}</td>";
echo "<td>{$forn_number}</td>";
echo "<td>{$forn_email}</td>";
echo "<td>{$forn_address}</td>";
echo "<td>{$forn_zip}</td>";
echo "<td>{$forn_local}</td>";
echo "<td>{$forn_phone}</td>";
echo "<td>{$forn_nif}</td>";

    echo "<td><a href='fornecedores.php?delete={$forn_id}'>Excluir</a></td>";
    /*echo "<td><a href='fornecedores.php?delete={$forn_id}'>Delete</a></td>";*/
    echo "<td><a href='fornecedores.php?edit={$forn_id}'>Editar</a></td>";
echo "</tr>";

}

}

?>



<?php
////////////////////////////////////////////////// DEVOLUCOES ///////////////////////////////////////////////


function insert_devolucoes() {
    
    global $connection;
    
    if(isset($_POST['submit'])) {
        
    $devolve_id = $_POST['devolve_id'];
    $artigo_id = $_POST['artigo_id'];
    $forn_email = $_POST['forn_email'];
    $forn_address = $_POST['forn_address'];
    $forn_zip = $_POST['forn_zip'];
    $forn_local = $_POST['forn_local'];
    $forn_phone = $_POST['forn_phone'];
    $forn_nif = $_POST['forn_nif'];
    
        
    $verification['forn_name'] 	= $forn_name;
    $verification['forn_email']	= $forn_email;
    $verification['forn_address']	= $forn_address;
    $verification['forn_zip'] 	= $forn_zip;
    $verification['forn_local'] 	= $forn_local;
    $verification['forn_phone'] 	= $forn_phone;
    $verification['forn_nif'] 	= $forn_nif;

        if(in_array('',$verification)){
            echo "Existem campos de preenchimento obrigatório não preenchidos. Verifique os dados inseridos.";
        }else{
            //insere na tabela da BD
                    $query = "INSERT INTO fornecedores(forn_name, forn_number, forn_email, forn_address, forn_zip, forn_local, forn_phone, forn_nif)";
                    $query .= "VALUE('$verification[forn_name]', '$verification[forn_name]', '$verification[forn_email]', '$verification[forn_address]', '$verification[forn_zip]', '$verification[forn_local]', '$verification[forn_phone]', '$verification[forn_nif]')";

                    $create_fornecedores_query = mysqli_query($connection, $query);
                    if(!$create_fornecedores_query) {

                        //se a query falhar função morre
                        die('QUERY FAILED' . mysqli_error($connection));    


                    }
        }
        
    }
    
}


function findAllDevolucoes() {
    
    global $connection;
    
    //find all categories query

$query = "SELECT * FROM fornecedores";
$select_fornecedores = mysqli_query($connection, $query);
                                
while($row = mysqli_fetch_assoc($select_fornecedores)) {
$forn_id = $row['forn_id'];
$forn_name = $row['forn_name'];
$forn_number = $row['forn_number'];
$forn_email = $row['forn_email'];
$forn_address = $row['forn_address'];
$forn_zip = $row['forn_zip'];
$forn_local = $row['forn_local'];
$forn_phone = $row['forn_phone'];
$forn_nif = $row['forn_nif'];

echo "<tr>";
echo "<td>{$forn_name}</td>";
echo "<td>{$forn_number}</td>";
echo "<td>{$forn_email}</td>";
echo "<td>{$forn_address}</td>";
echo "<td>{$forn_zip}</td>";
echo "<td>{$forn_local}</td>";
echo "<td>{$forn_phone}</td>";
echo "<td>{$forn_nif}</td>";

    echo "<td><a href='fornecedores.php?delete={$forn_id}'>Excluir</a></td>";
    /*echo "<td><a href='fornecedores.php?delete={$forn_id}'>Delete</a></td>";*/
    echo "<td><a href='fornecedores.php?edit={$forn_id}'>Editar</a></td>";
echo "</tr>";

}

}

?>



<?php
///////////////////////////////////////////// ARTIGOS ///////////////////////////////////////////////

function insert_artigos() {
    
    global $connection;
    
    if(isset($_POST['submit'])) {
        
    $artigo_code = $_POST['artigo_code'];
    $artigo_name = $_POST['artigo_name'];
    $artigo_uppc = $_POST['artigo_uppc'];
        
    $verification['artigo_code'] 	= $artigo_code;
    $verification['artigo_name']	= $artigo_name;
    $verification['artigo_uppc']	= $artigo_uppc;

        if(in_array('',$verification)){
            echo "Existem campos de preenchimento obrigatório não preenchidos. Verifique os dados inseridos.";
        }else{
            //insere na tabela da BD
                    $query = "INSERT INTO artigos(artigo_code, artigo_name, artigo_uppc)";
                    $query .= "VALUE('$verification[artigo_code]', '$verification[artigo_name]', '$verification[artigo_uppc]')";

                    $create_artigos_query = mysqli_query($connection, $query);
                    if(!$create_artigos_query) {

                        //se a query falhar função morre
                        die('QUERY FAILED' . mysqli_error($connection));    


                    }
        }
        
    }
    
}



function findAllArtigos() {
    
    global $connection;
    
    //find all categories query

$query = "SELECT * FROM artigos";
$select_artigos = mysqli_query($connection, $query);
                                
while($row = mysqli_fetch_assoc($select_artigos)) {
$artigo_id = $row['artigo_id'];
$artigo_code = $row['artigo_code'];
$artigo_name = $row['artigo_name'];
$artigo_uppc = $row['artigo_uppc'];


echo "<tr>";
echo "<td>{$artigo_id}</td>";
echo "<td>{$artigo_code}</td>";
echo "<td>{$artigo_name}</td>";
echo "<td>{$artigo_uppc}</td>";

    echo "<td><a href='artigos.php?delete={$artigo_id}'>Excluir</a></td>";
    echo "<td><a href='artigos.php?edit={$artigo_id}'>Editar</a></td>";
echo "</tr>";

}

}

?>