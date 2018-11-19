import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from '../../../../node_modules/@angular/common/http';
import { map } from '../../../../node_modules/rxjs/operators';
import { Client } from '../../classes/Client';
import { Subject } from '../../../../node_modules/rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
    isAuth : boolean = false;
    currentuser : Client;
    public authSubject = new Subject<boolean>()

    constructor(private http:HttpClient){
      if(localStorage.getItem('currentUser')){
      this.currentuser = JSON.parse(localStorage.getItem('currentUser'));
      this.isAuth=true;
      }

    }
    emitauth(){
      this.authSubject.next(this.isAuth);
    } 
   
    
    signIn(email : string,password:string){
      


      return this.http.get("http://localhost/projetphp/api/client/SignIn.php?Email="+email+"&Password="+password).pipe(
      map(
        jsonItem => Client.fromJson(jsonItem))
      ).toPromise();
    
    }
 
  }
