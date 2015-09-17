#include <iostream>
#include <string>
#include<cctype>
using namespace std;
int main()
{
	string a, b;
	cin >> a >> b;
	int result = 0 ;

    for (int i=0; i<a.size(); i++)
        if (tolower(a[i]) > tolower(b[i]))
        {
            result = +1 ;
            break ;
        }
        else if (tolower(a[i]) < tolower(b[i]))
        {
            result = -1 ;
            break ;
        }
	cout << result << endl ;
	return 0;
}
