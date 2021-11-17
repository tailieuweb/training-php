import { Component, OnInit } from '@angular/core';
import { ProductService } from '../product.service';
import { FormBuilder,Validators } from '@angular/forms';
import { Observable } from 'rxjs';
import { Product } from '../product';
import { ActivatedRoute, Router } from '@angular/router';
import { Input } from '@angular/core';
@Component({
  selector: 'app-admin-product',
  templateUrl: './admin-product.component.html',
  styleUrls: ['./admin-product.component.css']
})
export class AdminProductComponent implements OnInit {
  dataSave = false;
  ProductForm: any;
  allProduct!:Observable<Product[]>;
  productEdit!:number;
  getproducts: Product[] = [];
  message!:string;
  @Input() productData = { imgSrc: '', title: '',desc: '' };

  constructor(private formbulider: FormBuilder,private router: Router,private service:ProductService,private route: ActivatedRoute) { }

  ngOnInit(): void {
    this.ProductForm = this.formbulider.group({
      Id: ['',[Validators.required]],
      ImgSource:['',[Validators.required]],
      Title:['',[Validators.required]],
      Desc:['',[Validators.required]]
    });
    this.loadAllProduct();
  }

  addProduct(): void {
    this.service.addProduct(this.productData).subscribe((result) => {
      this.router.navigate(['/admin-product/' + result.id]);

      this.loadAllProduct();

    }, (err) => {
      console.log(err);
    });
    alert('Add product successfully')
  }

  clearClick(){

  }
  loadAllProduct(){
    this.allProduct = this.service.getAllProduct();
  }


  loadProductEdit(productId:string){
    this.service.getProductById(productId).subscribe(product=>{
      this.message="";
      this.dataSave = false;
      this.productEdit=product.id;
      this.ProductForm.controls['imgSrc'].setValue(product.imgSrc);
      this.ProductForm.controls['title'].setValue(product.title);
      this.ProductForm.controls['desc'].setValue(product.desc);
    });
  }


  delete(id: number): void {
    this.service.deleteProduct(id)
      .subscribe(() => {
          this.service.getAllProduct();
        }
        
        , (err) => {
          console.log(err);
        }
        
      );
      alert('Do you want to delete product')
      this.loadAllProduct();
  }
  resetForm(){
    this.productData.desc = "";
    this.productData.imgSrc = "";
    this.productData.title = "";
  }
}
