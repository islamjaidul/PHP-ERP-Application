#include<stdio.h>
int main()
{
    long long int a,b,c,m,n;
    int v,k;
    scanf("%lld%lld%lld",&a,&b,&c);
    m=a/c;
    if(a%c)
    //v=a;
    m++;
    n=b/c;
    if(b%c)
    //k=b;
    n++;
    printf("%lld\n",m*n);
    return 0;
}
