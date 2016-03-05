for(i=a_len-1;i>=0;i--){
var k=0;
   if(a[i]*b[0] < 10) {
     c[0] = a[i]*b[0];
   } else {
       c[0]= (a[i]*b[0])%10;
       k= Math.floor ((a[i]*b[0])%10)
      }
}


a=[8, 5, 4];
b=[3, 7, 3]
a_len=a.length;
b_len=b.length;
var cr=[];
var k=0;



for(j=0;j<=b_len-1;j++){
	cr=[];
	k=0;
	for(i=a_len-1;i>=0;i--){	
		var x = a[i]*b[j];
		if(x < 10) {			
			cr[i] = x + k;							
		} else {			
			cr[i] = x%10 + k;
			k = Math.floor(x/10);			
		}	
          };
	cr.unshift(k);
	console.log(cr);
 	
}	



if ( m<=4 ||
mod(m, 10) = 2 || 
mod(m, 10) = 3 || 
mod(m, 10) = 4 )
if ( mod(m, 10) = 1 &&
m <> 11 )
else





for(j=0;j<=b_len-1;j++){
	cr=[];
	k=0;
	for(i=a_len-1;i>=0;i--){	
		var x = a[i]*b[j];
		if(x < 10) {			
			cr[i] = x + k;							
		} else {			
			cr[i] = x%10 + k;
			k = Math.floor(x/10);			
		}	
          };
	cr.unshift(k);
	console.log(cr);
 	
}	
