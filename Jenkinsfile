pipeline {
    agent any

    stages {
        stage('Lint PHP') {
            steps {
                script {
                    if (isUnix()) {
                        sh 'find . -name "*.php" -exec php -l {} \\;'
                    } else {
                        bat 'for /r %%f in (*.php) do php -l "%%f"'
                    }
                }
            }
        }
    }
}
