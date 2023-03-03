<?php 
    require_once "C:/xampp/htdocs/coolTime/views/config.php";
    require_once "C:/xampp/htdocs/coolTime/model/CommandeM.php";

    class CommandeC {


        function afficherCommande() {
            $sql = "SELECT * FROM commande "; //afficher liste commande
            $db = config::getConnexion(); // connexion bd
            try {
                $query = $db->prepare($sql);
                $query->execute(); //executer la requete 

                 $liste = $query->fetchAll(); //afficher la liste des commande
                return $liste;
            } catch(Exception $e){ //message d'erreure 
				$e->getMessage();
			}
        }
        function rechCommande($id) {
            $sql = "SELECT * FROM commande where idCmd='$id' ";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();

                 $liste = $query->fetchAll();
                return $liste;
            } catch(Exception $e){
				$e->getMessage();
			}
        }


        function ajouterCommande($commande){
                            
             $productName=$commande->getproductName(); //appeller
             $dateCmd=$commande->getdateCmd();
             $prixtot=$commande->getprixtot();
             $idClient=$commande->getidClient();
             $etat="en cour"; 
            try {
                $sql = "INSERT INTO commande (nomProduit,dateCmd,prixtot,idClient,etat)
                VALUES('$productName','$dateCmd','$prixtot','$idClient','$etat')";

                $db = config::getConnexion();
                    $query = $db->prepare($sql);
                    $query->execute();
                } catch(Exception $e){
                    $e->getMessage();
                }
    }
   
        
       

    function modifierEtat($etat,$id){
            
           
       
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
            "UPDATE commande SET
             etat = '$etat' 
            WHERE idCmd = '$id'");
            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();

        }
     }
  

    function supprimerCommande($id){
        $db = config::getConnexion();
        $sql = "DELETE FROM commande where idCmd=:id";

        try {
            $query = $db->prepare($sql);
            $query->execute(['id'=>$id]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    



    }       