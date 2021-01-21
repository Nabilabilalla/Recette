<script language="JavaScript">
<!--
function rechercher() {
 document.form_recherche.submit();
}
-->
</script>

<form name="form_recherche" method="post" action="<? echo $URL; ?>">
<input type="text" name="recherche" size="40" maxlength="100">
<input name="Submit" type="button" value="Rechercher" onclick="rechercher()">
</form>
<?
require 'includes/config.php';

// Connexion à la base de données
@mysql_connect($host,$user,$pass)
   or die("Impossible de se connecter à la base de données");
@mysql_select_db("$bdd")
   or die("Impossible de se connecter à la base de données");

// Variables
$recherche = strtolower($recherche);
$motclef = explode(" ",$recherche);
$nbre_mots = 0;

// Requête pour la recherche
while ($nbre_mots < sizeof($motclef)) {
 if (strlen($motclef[$nbre_mots]) > 2) {
  $query_client = mysql_query ("SELECT client, file FROM $table WHERE client LIKE '%$motclef[$nbre_mots]%' ");
  $query_file = mysql_query ("SELECT client, file FROM $table WHERE file LIKE '%$motclef[$nbre_mots]%' ");
  while ($row_client = mysql_fetch_array($query_client)) {
  echo 'Trouvé dans le champ Client';
  echo '<br>';
  echo 'client:';
  echo '<br>'; 
  printf ("%s", $row_client[0]);
  echo '<br>';
  echo 'lien:';
  echo '<br>';
  printf ("%s", $row_client[1]);
  }
  while ($row_file = mysql_fetch_array($query_file)) {
  echo 'Trouvé dans le champ Lien';
  echo '<br>';
  echo 'client:';
  echo '<br>';
  printf ("%s", $row_file[0]);
  echo '<br>';
  echo 'lien:';
  echo '<br>';
  printf ("%s", $row_file[1]);
  }
 }
 $nbre_mots++;
}
?>