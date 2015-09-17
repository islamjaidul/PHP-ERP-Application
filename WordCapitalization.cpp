#include<iostream>
#include<cstring>
#include<cstdio>
#include<algorithm>
#include<cctype>
using namespace std;
int main()
{
    char str[1000];
    cin >> str;
    for(int i =0; i < strlen(str); i++) {
        if(i == 0) {
           char str2 = toupper(str[0]);
           cout << str2;
        } else {
            cout << str[i];
        }
    }
}
