#include<iostream>
#include<string>
#include<cstdlib>
using namespace std;
int main()
{
    int sum = 0, num = 0;
    string str;
    cin >> str;
    for(int i = 0; i < str.length(); i++) {
        if(str[i] == '1') {
           sum++;
           if(sum >= 7) {
                break;
           }
           num = num - num;
        } else if(str[i] == '0') {
            num++;
            if(num >= 7 || sum >= 7) {
                break;
            }
            sum = sum - sum;
        }
    }
    if(sum >= 7 || num >= 7){
       cout << "YES";
    } else{
        cout << "NO";
    }
}
