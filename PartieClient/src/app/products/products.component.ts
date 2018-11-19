import { Component, OnInit } from '@angular/core';
import { ProductService } from '../Services/product.service';
import { Product } from '../classes/Product';
import { Subject, Subscription } from '../../../node_modules/rxjs';
import { Router } from '../../../node_modules/@angular/router';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements OnInit {
  products: Product[];
  productsSubscription: Subscription;
  constructor(private productservice : ProductService, private router : Router ) {
  }
  
  SHowProductDetail(pr : Product){
   this.router.navigate(['productDetail',pr.Id]);
 }
 ngOnInit() {
  this.productsSubscription = this.productservice.productsSubject.subscribe(
    (products: Product[]) => {
      this.products = products;
      
    }
  );

  this.productservice.emitproducts();
}

ngOnDestroy(){
  this.productsSubscription.unsubscribe();
}
}
 


