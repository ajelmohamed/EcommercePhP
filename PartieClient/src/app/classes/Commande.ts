import { Client } from "./Client";
import { Product } from "./Product";

export class Commande {
    Id: string;
     Date: string;
     Client: Client;
     Produit: Product;
     Quantity: string;
     Total: string;
     Status: string;

     public static fromJson(json: Object): Commande {

        const p = new Product(
                json['Id'],
                json['Name'],
                json['Description'],
                json['Price'],
                json['Category_id'],
                json['Category_name'],
                json['Created'],
                json['Img']
        
            );
        const c=new Commande(

        )    
            return c;
        }
     constructor (Id: string
        Date: string
        Client: Client
        Produit: Product
        Quantity: string
        Total: string
        Status: string)   
        

    }
