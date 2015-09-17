#include<iostream>
using namespace std;
int main()
{
    int n, k, num = 0;
    int score[100];
    cin >> n >> k;
    for(int i = 0; i < n; i++) {
        cin >> score[i];
    }
    for(int j = 0; j < n; j++) {
        if(score[j] >= score[k - 1] && score[j] > 0) {
            num++;
        }
    }
    cout << num;
    return 0;
}
