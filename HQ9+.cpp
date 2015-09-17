#include<iostream>
#include<string>
#include<cctype>
using namespace std;
int main()
{
    int yes = 0;
    char n[4] = {'H', 'Q', '9'};
    string p;
    cin >> p;
    for(int i = 0; i < p.length(); i++) {
        for(int j = 0; j < 4; j++) {
            if(p[i] == n[j]) {
                yes++;
            }
        }
    }
    if(yes > 0) {
        cout << "YES";
    } else {
        cout << "NO";
    }
}
