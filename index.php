<!DOCTYPE html>
<html>
<head>
  <title>MyContacts</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Bienvenue dans MyContacts 📱</h1>
  <p>Gérez facilement vos contacts en ligne.</p>
  <a href="add_contact.php">➕ Ajouter un contact</a> |
  <a href="contacts.php">📇 Voir les contacts</a>
</body>
</html>
add_contact.php
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ajouter un contact</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>➕ Ajouter un contact</h2>
  <form method="POST" enctype="multipart/form-data">
    <input name="nom" placeholder="Nom" required>
    <input name="prenom" placeholder="Prénom" required>
    <input name="telephone" placeholder="Téléphone" required>
    <input name="email" placeholder="Email" required>
    <input type="file" name="photo">
    <button type="submit" name="add">Ajouter</button>
  </form>

<?php
if (isset($_POST['add'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $tel = $_POST['telephone'];
  $email = $_POST['email'];
  $photoPath = "";

  if ($_FILES['photo']['name']) {
    $photoPath = "uploads/" . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
  }

  $sql = "INSERT INTO contacts (nom, prenom, telephone, email, photo)
          VALUES ('$nom', '$prenom', '$tel', '$email', '$photoPath')";
  $conn->query($sql);
  echo "<p>✅ Contact ajouté !</p>";
}
?>
</body>
</html>
