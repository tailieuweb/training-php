import { Input } from '@angular/core';
import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Router } from '@angular/router';
import { ProductService } from '../product.service';

@Component({
  selector: 'app-product-edit',
  templateUrl: './product-edit.component.html',
  styleUrls: ['./product-edit.component.css']
})
export class ProductEditComponent implements OnInit {

  @Input() productData:any = {id:null, imgSrc: '', title: '',desc: '' };
  constructor(public rest: ProductService,private route: ActivatedRoute, private router: Router) { }

  ngOnInit(): void {
    this.rest.getProductById(this.route.snapshot.params.id).subscribe((data: {}) => {
      console.log(data);
      this.productData = data;
    });
  }

  updateProduct(): void {
    this.rest.updateProduct(this.route.snapshot.params.id, this.productData).subscribe((result) => {
      this.router.navigate(['/admin-product']);
    }, (err) => {
      console.log(err);
    });
    alert('Edit successfully')
  }

}
