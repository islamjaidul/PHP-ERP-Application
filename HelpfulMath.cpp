#include <iostream>
#include <cstdio>
#include <cstring>
#include <algorithm>
using namespace std;
int main()
{
    int count = 1;
   char str[100];
   cin >> str;
    sort(str, str + strlen(str));
   for(int i = 0; i < strlen(str); i++) {
        if(str[i] != '+') {
            cout << str[i];
            if(i < (strlen(str)-1) ) {
                cout << '+';
            }
        }
   }
}
