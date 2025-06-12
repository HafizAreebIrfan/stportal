pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/HafizAreebIrfan/stportal.git'
            }
        }

        stage('PHP Lint') {
            steps {
                sh 'find . -name "*.php" -exec php -l {} \;'
            }
        }

        stage('Notify') {
            steps {
                echo 'Build and test completed!'
            }
        }
    }
}
