<?php

    require_once("../model/Categorie.class.php");
    require_once("../model/Article.class.php");
    require_once("../model/User.class.php");

    // Creation de l'unique objet DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try {
              $this->db = new PDO('sqlite:../data/db/lamoucherie.db');
            }
            catch (PDOException $e){
              die("erreur de connexion:".$e->getMessage());
            }
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///methode sur les articles
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //récupère un article à partir de sa référence
        //retourne l'article
        function getArticle( int $ref){
          $req = "SELECT * FROM article WHERE ref=$ref";
          $descripteur = $this->db->query($req);
          $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
          return $result[0];
        }

        // Accès aux 12 premiers articles
        // Cette méthode retourne un tableau contenant les 12 permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN( int $cat) : array {
            if ($cat==0){
              $req = "SELECT * FROM article LIMIT 12";
            }else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM article WHERE categorie IN (select id FROM categorie WHERE pere=$cat) LIMIT 12";
              }else{
                $req = "SELECT * FROM article WHERE categorie=$cat LIMIT 12";
              }
            }

            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        function getNbArticle(int $cat) : int {
            if ($cat==0){
              $req = "SELECT * FROM article";
            }else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM article WHERE  categorie IN (select id FROM categorie WHERE pere=$cat)";
              }else{
                $req = "SELECT * FROM article WHERE categorie=$cat";
              }
             }
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');

            return sizeof($result);
        }

        // Accès aux 12 articles suivant le derniers affiché
        // Cette méthode retourne un tableau contenant les 12 articles, suivant le derniers affiché, de
        // la base sous la forme d'objets de la classe Article.
        function next(int $ref, int $cat) : array {
            if ($cat==0)
              $req = "SELECT * FROM (select * from article order by ref) WHERE ref >$ref LIMIT 12";
            else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM (select * from article order by ref) WHERE ref >$ref AND categorie IN (select id FROM categorie WHERE pere=$cat) LIMIT 12";
              }else{
                $req = "SELECT * FROM (select * from article order by ref) WHERE ref >$ref AND categorie=$cat LIMIT 12";
              }
            }

            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        // Accès aux 12 articles précédents le derniers affiché
        // Cette méthode retourne un tableau contenant les 12 articles, précédents le derniers affiché, de
        // la base sous la forme d'objets de la classe Article.
        function prec(int $ref, int $cat): array {
            if ($cat==0)
              $req = "SELECT * FROM (select * from article order by ref DESC) WHERE ref < $ref LIMIT 12";
            else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM (select * from article order by ref DESC) WHERE ref < $ref AND categorie IN (select id FROM categorie WHERE pere=$cat) LIMIT 12";
              }else{
                $req = "SELECT * FROM (select * from article order by ref DESC) WHERE ref < $ref AND categorie = $cat LIMIT 12";
              }
            }

            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return array_reverse($result);
        }

        //ajoute un article à la base de donnée
        function addArticle($libelle, $description, $categorie, $prix, $image){
          $req = $this->db->prepare("INSERT INTO article VALUES ((SELECT max(id)+1 FROM user), :libelle, :description, :categorie, :prix, :image)");
          $param = array('libelle' => $libelle, 'description' => $description,'categorie' => $categorie , 'prix' => $prix, 'image' => $image);
          $req->execute($param);
        }

        //Supprime un article selon sa référence
        function removeArticle($ref){
          $req = $this->db->prepare("DELETE FROM article WHERE ref=?");
          $req->execute(array($ref));
        }

        //Récupére tous les articles
        function getAllArticle(){
            $req = "SELECT * FROM article";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        //récupère les 10 articles les plus vendus
        function getBestArticle(){
            $req = "SELECT * FROM article WHERE ref IN (SELECT ref FROM quantachat ORDER BY quantite DESC LIMIT 10)";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///methode sur les catégories
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //on regarde si une catégorie est une catégorie père
        function estUneCatPere(int $cat) : int {
          $req = "SELECT id FROM categorie WHERE id=$cat AND pere=id";
          $descripteur = $this->db->query($req);
          $estUneCatPere = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
          return sizeof($estUneCatPere);
        }

        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {
            $catPere = "SELECT * FROM categorie WHERE id=pere";
            $descripteur = $this->db->query($catPere);
            $resCatPere = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Categorie');
            $resultat = array();
            foreach ($resCatPere as $key => $value) {
              $sousCatPere = "SELECT * FROM categorie WHERE pere=$value->id AND id!=pere";
              $descripteur = $this->db->query($sousCatPere);
              $resSousCatPere = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Categorie');
              array_unshift($resSousCatPere, $value);
              $resultat[] = $resSousCatPere;
            }
            return $resultat;
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///methode sur les utilisateurs
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //ajoute un utilisateur à la base de données
        function addUser($mail, $password, $nom, $prenom, $statut){
          $req = $this->db->prepare("INSERT INTO user VALUES ((SELECT max(id)+1 FROM user), :email, :pass, :nom, :prenom, :statut)");
          $param = array('email' => $mail, 'pass' => $password,'nom' => $nom , 'prenom' => $prenom, 'statut' => $statut);
          $req->execute($param);
          //$result = $req->fetchAll(PDO::FETCH_CLASS, 'User');
        }

        //Supprime un utilisateur selon son adresse mail
        function removeUser($mail){
          $req = $this->db->prepare("DELETE FROM user WHERE mail=?");
          $req->execute(array($mail));
        }

        //on vérifie si l'adresse mail est dans la base de données
        //retourne vrai non présente
        function verifMail($mail) : int {
          $req = $this->db->prepare("SELECT * FROM user WHERE mail= :mail");
          $req->execute(array('mail' => $mail));
          $result = $req->fetchAll(PDO::FETCH_CLASS, 'User');
          return sizeof($result);
        }

        //on regarde si l'utilisateur existe dans la base de donnée
        function verifUser($mail, $password) : int {
          if ( $this->verifMail($mail) == 1){
            $req = $this->db->prepare("SELECT * FROM user WHERE mail=?");
            $req->execute(array($mail));
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result[0]->pass == $password;
          }else{
            return 0;
          }
        }

        //récupère toutes les infos sur un compte
        function getUser($mail){
            $req = $this->db->prepare("SELECT * FROM user WHERE mail=?");
            $req->execute(array($mail));
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result[0];
        }

        function getAllUser(){
            $req = "SELECT * FROM user";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result;
        }
    }

    ?>
