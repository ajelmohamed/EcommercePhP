import { Injectable } from '@angular/core';
import { Commande } from '../classes/Commande';
import { Subject } from '../../../node_modules/rxjs';

@Injectable({
  providedIn: 'root'
})
export class CommandeService {

  private listecommande=[];

  public commandesSubject = new Subject<Commande[]>()
  constructor(){
    this.getcommandeFromServer();
  }

  getcommandeFromServer(){

  }

  emitcommandes(){
    this.commandesSubject.next(this.listecommande.slice());
  } 

  addcommande(newEmp : Commande){
     this.listecommande.push(newEmp);
     this.emitcommandes();
    //this.getcommandeFromServer();
  }

  
  
}
