pipeline {
    agent any

    options {
        skipDefaultCheckout(true)
    }

    stages {
        stage('Git') {
            steps {
                echo '> Checking out the Git version control ...'
                checkout scm
            }
        }
        stage('Build') {
            steps {
                echo '> Building the docker images ...'
                sh 'make -sC build'
            }
        }
    }
}
