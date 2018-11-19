export class Product {
public Id:string;
public Name:string;
public Description:string;
public Price:string;
public Category_id:string;
public Category_name:string;
public Created:string;
public Img:string;

public static fromJson(json: Object): Product {

const p = new Product(
        json['Id'],
        json['Name'],
        json['Description'],
        json['Price'],
        json['Category_id'],
        json['Category_name'],
        json['Created'],
        json['Img']

    );
    console.log(p)
    return p;
}

constructor( Id: string, Name:string, Description:string, Price:string, Category_id:string, Category_name:string, Created:string, Img:string) {
    this.Id=Id;
     this.Name=Name;
    this.Description=Description;
    this.Price=Price;
    this.Category_id=Category_id;
    this.Category_name=Category_name;
    this.Created=Created;
    this.Img=Img;
}

}