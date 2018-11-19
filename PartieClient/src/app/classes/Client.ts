export class Client {
    
    Id: string;
    FirstName: string;
    LastName:string;
    Email:string;
    Password:string;
    PhoneNumber:string;
    Adress:string;
    
    public static fromJson(json: Object): Client {

        const p = new Client(
                json['Id'],
                json['FirstName'],
                json['LastName'],
                json['Email'],
                json['Password'],
                json['PhoneNumber'],
                json['Adress'],

                
        
            );
            console.log(p)
            return p;
        }
        constructor(Id: string, FirstName: string, LastName:string, Email:string, Password:string, PhoneNumber:string, Adress:string){
            this.Email=Email;
            this.Id=Id;
            this.LastName=LastName;
            this.FirstName=FirstName;
            this.Password=Password;
            this.Adress=Adress;
            this.PhoneNumber=PhoneNumber
        }
}