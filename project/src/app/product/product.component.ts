import { Component, OnInit } from '@angular/core';
import { ProductService } from '../product.service';
import { FormBuilder,Validators } from '@angular/forms';
import { Observable } from 'rxjs';
import { Product } from '../product';
@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {
  dataSave = false;
  ProductForm: any;
  allProduct!:Observable<Product[]>;
  productEdit = null;
  message = null;
  constructor(private formbulider: FormBuilder,private service:ProductService) { }

  ngOnInit(): void {
    this.ProductForm = this.formbulider.group({
      Id: ['',[Validators.required]],
      ImgSource:['',[Validators.required]],
      Title:['',[Validators.required]],
      Desc:['',[Validators.required]]
    });
    this.loadAllProduct();
  }

  loadAllProduct(){
    this.allProduct = this.service.getAllProduct();
  }
  
}
