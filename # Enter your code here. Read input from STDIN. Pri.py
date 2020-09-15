# Enter your code here. Read input from STDIN. Print output to STDOUT
t = int(input())
test_cases=[]

def nugangs_func(test_case):
    N = int(test_case[0])
    M = int(test_case[1])
    pos = [int(p) for p in test_case[2].split(' ')]
    speed = [int(s) for s in test_case[3].split(' ')]

    pos_speed = [[pos[i], speed[i]] for i in range(N)]
    
    gang=N
    for i in range(N):
        for j in range(N):
            if pos[i]<pos[j] and speed[i]>speed[j]:
                gang-=1
                speed[j] = speed[i]

    return gang

for _ in range(t):
    test_case =[]
    test_case.append(input()) #N
    test_case.append(input()) #M 
    test_case.append(input()) # N integers -> positions of nutants
    test_case.append(input()) # N integers -> Speed of nutants 
    print(nugangs_func(test_case))







