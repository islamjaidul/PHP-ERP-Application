#include<iostream>
using namespace std;
int main()
{
    int n, num = 0, p, v, t, sum = 0;
    cin >> n;
    for(int i = 1; i <= n; i++) {
        cin >> p >> v >> t;
        num = p + v + t;
        if(num >= 2) {
            sum++;
        }
    }
    cout << sum;
}
