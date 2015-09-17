#include<iostream>
#include<string>
using namespace std;
int main()
{
    int n, sum = 0;
    string str;
    char x;
    cin >> n;
    for(int i = 0; i < n; i++) {
        cin >> str[i];
        if(x == str[i]) {
            sum++;
        }
        x = str[i];
    }
    cout << sum;
    return 0;
}
