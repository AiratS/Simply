const PHOTO_AVATAR = 'avatar';
const PHOTO_BACKGROUND = 'background';

export default axios => ({
  getProfile(userId) {
    return axios.get('/api/profile/' + userId);
  },
  getProfilePosts(userId) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve({
          data: [
            {
              author: 'John Doe',
              time: '3 min ago',
              content: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit." +
                " Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque " +
                "penatibus et magnis dis parturient montes, nascetur ridiculus mus." +
                " Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
            },
            {
              author: 'John Doe',
              time: '3 min ago',
              content: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit." +
                " Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque " +
                "penatibus et magnis dis parturient montes, nascetur ridiculus mus." +
                " Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem."
            },
          ]
        });
      }, 400);
    });
  },
  uploadAvatarPhoto(file) {
    return this.uploadPhoto(file, PHOTO_AVATAR);
  },
  uploadBackgroundPhoto(file) {
    return this.uploadPhoto(file, PHOTO_BACKGROUND);
  },
  uploadPhoto(file, type = null) {
    let formData = new FormData();
    formData.append('photo', file);

    if (type) {
      formData.append('type', type);
    }

    return axios.post('/api/profile-upload-photo', formData, {
      'Accept': 'application/ld+json',
      'Content-Type': 'multipart/form-data',
    });
  }
});