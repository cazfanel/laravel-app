pipeline {
    agent any

    options {
        skipDefaultCheckout(true)
    }

    stages {
        stage('Checkout SCM') {
            steps {
                echo '> Checking out the source control ...'
                checkout scm
            }
        }
        stage('Git Pull') {
            steps {
                echo '> Pulling the code from GitHub repository ...'
                sh 'git remote update && git checkout master && git pull origin'
            }
        }
        stage('Build') {
            steps {
                echo '> Building the docker images ...'
                sh 'cd docker && make build'
            }
        }
    }
}
