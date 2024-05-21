# Use the official Node.js 14 image as a base
FROM node:14 AS build

# Set the working directory in the container
WORKDIR /app

# Copy package.json and package-lock.json to the working directory
COPY package.json package-lock.json ./

# Install dependencies
RUN npm install

# Copy the remaining source code to the working directory
COPY . .

# Expose port 3000 to the outside world
EXPOSE 3000

# Start the React development server
CMD ["npm", "start"]