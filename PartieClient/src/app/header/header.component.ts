import { Component, OnInit } from '@angular/core';
import { AuthService } from '../Services/authentication/auth.service';
import { Router } from '../../../node_modules/@angular/router';
import { Subscription } from '../../../node_modules/rxjs';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  isAuth : boolean;
  isauthSubscription: Subscription;
  constructor(private auth:AuthService, private route:Router) { 
    this.isAuth=this.auth.isAuth;
  }

  ngOnInit() {
    this.isauthSubscription = this.auth.authSubject.subscribe(
      (isauth: boolean) => {
        this.isAuth = isauth;
        
      }
    );
  
    this.auth.emitauth();
  }

  viewCommande(){
    this.route.navigate(['commande']);
  }

  logaout(){
    this.auth.isAuth=false;
    localStorage.removeItem('currentUser');
    this.auth.emitauth();
    this.route.navigate(['authentication']);
    

  }

  login(){
    this.route.navigate(['authentication']);

  }

}
