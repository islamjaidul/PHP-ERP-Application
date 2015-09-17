#include<iostream>
using namespace std;
int main()
{
    int a, b, c = 0, sum = 0, n;
    cin >> n;
    for(int i = 1; i <= n; i++) {
        cin >> a >> b;
        c += b;
        c -= a;
        if(c > sum) {
            sum = c;
        }
    }
    cout << sum;
}
