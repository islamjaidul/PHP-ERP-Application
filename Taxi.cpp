#include<iostream>
using namespace std;
int main()
{
    long long int n;
    int one = 0, two = 0, four = 0, three = 0, sum = 0, temp = 0, car = 0;
    cin >> n;
    int group[n];
    for(int i = 0; i < n; i++) {
        cin >> group[i];
        if(group[i] == 4) {
            four++;
        } else if(group[i] == 3) {
            three++;
        } else if(group[i] == 2) {
            two++;
        } else if(group[i] == 1) {
            one++;
        }
    }
    if(one != 0 && three != 0) {
        sum += three - (three - one);
    }
    if(one == 0 && three != 0) {
        sum += three;
    } else {
        sum += three - sum;
    }
    if(one > three) {
        one = one - sum;
    } else {
        one = 0;
    }

    if(one != 0 || two != 0) {
        temp = one + (two*2);
        if(temp > 3) {
            sum += temp / 4;
            if(temp % 4 != 0) {
                sum += 1;
            }
        } else {
            sum += 1;
        }
    }
    sum += four;
    cout << sum;
    return 0;
}
