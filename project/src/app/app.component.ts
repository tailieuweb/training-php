import { Component } from '@angular/core';
import { Router } from '@angular/router';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'FoodOderItem';

  constructor(private routes:Router){ 
  }
  gotoPage():void{
    this.routes.navigate(['admin-product'])
  }
}
