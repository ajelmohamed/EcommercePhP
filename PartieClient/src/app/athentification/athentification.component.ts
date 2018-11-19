import { Component, OnInit } from '@angular/core';
import { Client } from '../classes/Client';
import { AuthService } from '../Services/authentication/auth.service';
import { Router } from '../../../node_modules/@angular/router';
import {  FormGroup, Validators, FormBuilder } from '../../../node_modules/@angular/forms';


@Component({
  selector: 'app-athentification',
  templateUrl: './athentification.component.html',
  styleUrls: ['./athentification.component.css']
})
export class AthentificationComponent implements OnInit {

  loginForm: FormGroup;
  registerForm:FormGroup;
  
    constructor(private formBuilder: FormBuilder,private authserv : AuthService, private router: Router) 
    { 

    }
    SignIn(){
      const email=this.loginForm.get('email').value;
      const pass=this.loginForm.get('password').value;
      {
        this.authserv.signIn(email,pass)
          .then((result) => {
        this.authserv.currentuser = result;
        localStorage.setItem('currentUser', JSON.stringify(result));
        this.authserv.isAuth=true;
        this.authserv.emitauth();
        this.router.navigate(['product'])
        
      })
      .catch((error) => console.error(error));
    }
      
    }
  
    
    ngOnInit() {
      this.initForm();
    }
    initForm() {
      this.loginForm = this.formBuilder.group({
        email: ['',[ Validators.required ,Validators.email]],
        
        password: ['', [Validators.required,Validators.minLength(5)]],
      });
    }
  
  }
  