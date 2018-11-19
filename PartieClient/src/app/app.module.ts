import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {Routes,RouterModule} from '@angular/router';

import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { ProductsComponent } from './products/products.component';
import { ProductsDetailsComponent } from './products-details/products-details.component';
import { CommandesComponent } from './commandes/commandes.component';
import { AthentificationComponent } from './athentification/athentification.component';
import {HttpClientModule} from "@angular/common/http";
import { AuthService } from './Services/authentication/auth.service';
import { AuthGuardService } from './Services/authentication/auth-guard.service';
import {ReactiveFormsModule , FormsModule} from '@angular/forms'

const routes: Routes = [
  { path: 'productDetail/:id', component: ProductsDetailsComponent },
  { path: 'product', component: ProductsComponent },
  {path:'authentication',component:AthentificationComponent},
  {path:'commande', canActivate: [AuthGuardService],component:CommandesComponent}

];

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    ProductsComponent,
    ProductsDetailsComponent,
    CommandesComponent,
    AthentificationComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    RouterModule.forRoot(routes),
    FormsModule,
    ReactiveFormsModule

  ],
  providers: [
    AuthService,
    AuthGuardService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
