#include <stdio.h>
#include <math.h>

int main() {
    int n;
    double sum = 0;

    printf("Nhập số nguyên dương n: ");
    scanf("%d", &n);

    if (n <= 0) {
        printf("Số n phải là số nguyên dương.\n");
    } else {
        for (int i = 1; i <= n; i++) {
            double t = pow(-1, i + 1) / (2 * i - 1);
            sum += t;
        }

        printf("Tổng của chuỗi là: %lf\n", sum);
    }

    return 0;
}
