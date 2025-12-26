FROM node:18-alpine

WORKDIR /app

# 创建包目录结构
RUN mkdir -p src

# 复制文件（稍后会创建）
COPY src/ src/
COPY package.json .
COPY README.md .
COPY LICENSE .

# 默认命令
CMD ["node", "-e", "const pkg = require('./src/index.js'); console.log('ai-minecraft-skin v1766.718.679'); console.log('Homepage: https://supermaker.ai/image/ai-minecraft-skin/');"]
