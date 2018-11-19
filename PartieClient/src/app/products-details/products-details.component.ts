import { Component, OnInit, Input } from '@angular/core';
import { Product } from '../classes/Product';
import { Router, ActivatedRoute } from '../../../node_modules/@angular/router';
import { ProductService } from '../Services/product.service';
import { Subscription } from '../../../node_modules/rxjs';

@Component({
  selector: 'app-products-details',
  templateUrl: './products-details.component.html',
  styleUrls: ['./products-details.component.css']
})
export class ProductsDetailsComponent implements OnInit {
  products: Product[];
  prod:Product =new Product("","","","","","","","");
  productsSubscription: Subscription;
  constructor(private productservice : ProductService, private router : Router ,private route: ActivatedRoute ) {
  }
  
  
 ngOnInit() {
  const id = this.route.snapshot.params['id'];
  {
    this.productservice.OneProduct(id)
      .then((result) => {
    this.prod = result;
  })
  .catch((error) => console.error(error));
}
 }
}
