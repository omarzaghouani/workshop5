<?php 
    require_once "C:/xampp/htdocs/coolTime/views/config.php";
    require_once "C:/xampp/htdocs/coolTime/model/PanierM.php";

    class PanierC {


        function afficherProduit() {
            $sql = "SELECT * FROM produit ";
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


        function ajouterAuPanier($panier){
                            
             $productName=$panier->getproductName();
             $quantite=$panier->getquantite();
             $pd_img=$panier->getpd_img();
             $prixtot=$panier->getprixtot();
             $price=$panier->getprice();
             $idClient=$panier->getidClient();
    try {
        $sql = "INSERT INTO panier (productName,quantite,prodImg,prixtot,price,idClient)
        VALUES('$productName','$quantite','$pd_img','$prixtot','$price','$idClient')";

        $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute();
        } catch(Exception $e){
            $e->getMessage();
        }
    }
    function getProd($name) {
        $sql = "SELECT * FROM produit where name=:name";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['name'=>$name
                              
        ]);
        
        $liste = $query->fetch();
        return $liste;
    } catch(Exception $e){
        $e->getMessage();
    }
}
    function findProd($name) {
        $sql = "SELECT * FROM panier where productName=:name";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['name'=>$name
                              
        ]);
        //verifier si le produit est la 
        
        $liste = $query->fetch();
        return $liste;
    } catch(Exception $e){
        $e->getMessage();
    }
}
    function modifierPanier($produit,$quantite,$prixtot){
            
           
       
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
            "UPDATE panier SET
             quantite = '$quantite' ,prixtot='$prixtot'
            WHERE productName = '$produit'");
            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();

        }
     }
     function afficherPanier() {
        $sql = "SELECT * FROM panier ";
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

    function supprimerPanier($id){
        $db = config::getConnexion();
        $sql = "DELETE FROM panier where id=:id";

        try {
            $query = $db->prepare($sql);
            $query->execute(['id'=>$id]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }
    function viderPanier($id){
        $db = config::getConnexion();
        $sql = "DELETE FROM panier where idClient=:id";

        try {
            $query = $db->prepare($sql);
            $query->execute(['id'=>$id]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    // function modifierProduit($produit,$reference){
            
           
    //     $name=$produit->getname();
    //     $price=$produit->getprice();
    //     $pd_img=$produit->getpd_img();
    //     try {
    //         $db = config::getConnexion();
    //         $query = $db->prepare(
    //         "UPDATE produit SET
    //          name = '$name',  price= '$price',pd_img= '$pd_img'
    //         WHERE reference = '$reference'");
    //         $query->execute();
    //         echo"succ";
    //     } catch (PDOException $e) {
    //         $e->getMessage();

    //     }
    // }
    // function affichermodif($ref) {
    //     $sql = "SELECT * FROM produit where reference=:ref";
    //     $db = config::getConnexion();
    //     try {
    //         $query = $db->prepare($sql);
    //         $query->execute(['ref'=>$ref]);

    //          $liste = $query->fetchAll();
    //         return $liste;
    //     } catch(Exception $e){
    //         $e->getMessage();
    //     }
    // }



   




    }       