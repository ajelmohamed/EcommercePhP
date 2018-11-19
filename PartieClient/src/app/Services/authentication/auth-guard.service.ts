import { Injectable } from '@angular/core';
import { AuthService } from './auth.service';
import { Router } from '../../../../node_modules/@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthGuardService {

  constructor(private router : Router, private authserv:AuthService) { 

  }
  canActivate():  boolean {
    if (localStorage.getItem('currentUser')) {
      // logged in so return true
      return true;
  }

  // not logged in so redirect to login page with the return url
  this.router.navigate(['authentication']);
  return false;
}
}
