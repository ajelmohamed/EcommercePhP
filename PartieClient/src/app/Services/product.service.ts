import { Injectable } from '@angular/core';
import { Product } from '../classes/Product';
import { Subject, Observable } from '../../../node_modules/rxjs';
import { HttpClient } from '@angular/common/http';
import { map, catchError, finalize } from 'rxjs/operators';
import { throwError } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  public listeproduct=[];
  public prod:Product;
  apiUrl:string = "http://localhost/projetphp/api/product/read.php";


  public productsSubject = new Subject<Product[]>()
  constructor(private http:HttpClient){
    this.getproductFromServer().subscribe(
      products => {this.listeproduct = products;
        this.emitproducts();

      }
    );
  }

  getproductFromServer():Observable<Product[]>{
   
      return this.http.get(this.apiUrl).pipe(
        map(
          (jsonArray: Object[]) => jsonArray.map(jsonItem => Product.fromJson(jsonItem))
        )
      );
    }
  
     

  emitproducts(){
    this.productsSubject.next(this.listeproduct.slice());
  } 

  OneProduct(id:string){
    return this.http.get("http://localhost/projetphp/api/product/read_one.php?id="+id).pipe(
      map(
        jsonItem => Product.fromJson(jsonItem))
      ).toPromise();
    
  }


  
}
