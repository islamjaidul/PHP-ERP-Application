#include<iostream>
#include<string>
using namespace std;
int main()
{
    int n, sum = 0;
    string x;
    cin >> n;
    for(int i = 1; i <= n; i++) {
        cin >> x;
        if(x == "++X") {
            ++sum;
        } else if(x == "X++") {
            sum++;
        } else if(x == "--X") {
            --sum;
        } else if(x == "X--") {
            sum--;
        } else{
            sum;
        }
    }
    cout << sum;
}
