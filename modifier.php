<?php
include 'connexion.php';


$stmt = $conn->query('SELECT * FROM menu');
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modifier</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" ></script>
</head>
<body>
    <style>
        li span{
            margin-left:15px;
        }
        
     li a{
        color: gray;
    margin-right: 5px;
 }
     

     </style>   
    <header>
        <h1>Modification Menu</h1>
        <nav>
            <ul>
                <li><a href="index.php">acceuil</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="order.php">Commander</a></li>
                <li><a href="reservation.php">Réserver une table</a></li>
                <li><a href="add_menu.php">Ajouter un élément au menu</a></li>
            </ul>
        </nav>
    </header>
    <main>
       
    <div>
<?php
 $name="";
 $price="";
 $id="";
if(isset($_GET['item'])){

    $stmt = $conn->query('SELECT * FROM menu WHERE id='.$_GET['item']);
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($menuItems as $item){
        $name=$item['name'];
        $price=$item['price'];
        $id=$item['id'];
    }
    
} else if (isset($_POST['name']) && isset($_POST['price']) && is_numeric($_POST['price']) && $_POST['price'] > 0) {
    $nameup = $_POST['name'];
    $priceup = $_POST['price']; // Assurez-vous que le prix est récupéré ici
    $item=$_POST['item'];
    $stmt = $conn->prepare("UPDATE `menu` SET `name`=?,`price`=? WHERE id=?");
    $stmt->execute([ $nameup, $priceup,$item]);
    echo "<p>L'élément '$nameup' a été modifé  avec succès !</p>";
} else {
    echo "<p>Le prix doit être un nombre positif.</p>";
}
?>
   <form action="modifier.php" method="post">
            <label for="name">Nom de l'élément :</label>
            <input type="text" id="name" name="name" value="<?php echo $name ?>" required>
            <label for="price">Prix :</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo $price ?>"  required>
            <input type="hidden" name="item" value="<?php echo $id ?>">
            <input type="submit" value="Modifier">
        </form>
    </div>
    </main>
</body>
</html>