import { Injectable } from '@angular/core';
import {HttpClient,HttpErrorResponse} from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
import { Observable, observable } from 'rxjs';
import { Product } from './product';
import { catchError, tap } from 'rxjs/operators';
import {  throwError } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  url = 'https://foodordersapi.azurewebsites.net/index.html';
  constructor(private http:HttpClient) { }

  getAllProduct(): Observable<Product[]>
  {
    return this.http.get<Product[]>('https://foodordersapi.azurewebsites.net/api/Foods');
  }

  getProductById(product: string):Observable<Product>
  {
    return this.http.get<Product>('https://foodordersapi.azurewebsites.net/api/Foods/' +product)
  }

  addProduct(product: any): Observable<any> {
    return this.http.post('https://foodordersapi.azurewebsites.net/api/Foods', product).pipe(
      catchError(this.errorHandler)
    );
  }

  updateProduct(id: number, product: Product): Observable<any> {
    return this.http.put<Product>('https://foodordersapi.azurewebsites.net/api/Foods/' + id, product).pipe(
      catchError(this.errorHandler)
    );
  }

  deleteProduct(id: number): Observable<any> {
    return this.http.delete<Product>('https://foodordersapi.azurewebsites.net/api/Foods/' + id).pipe(
      catchError(this.errorHandler)
    );
  }

  errorHandler(error: { error: { message: string; }; status: any; message: any; }) {
    let errorMessage = '';
    if(error.error instanceof ErrorEvent) {
      // Get client-side error
      errorMessage = error.error.message;
    } else {
      // Get server-side error
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    console.log(errorMessage);
    return throwError(errorMessage);
 }
}
