document.addEventListener('alpine:init', () => {
    Alpine.data('MeetingCRUD', () => ({
        ...alpineData,
        detailModalOpen: false,
        saveModalOpen: false,
        deleteConfirmModalOpen: false,
        openSaveModal(id = null) {
            if (!$('body').hasClass('overflow-hidden')) {
                $('body').addClass('overflow-hidden');
                this.saveModalOpen = true;
                if (id) {
                    $('#saveModalTitle').text('Edit Meeting');

                    meeting = this.meetings.find(meeting => meeting.id == id);
                    $('#input-id').val(meeting.id);
                    $('#input-title').val(meeting.title);
                    $('#input-description').val(meeting.description);
                    $('#input-meeting-id').val(meeting.meeting_id);
                    $('#input-start-at').val(moment.utc(meeting.start_at).format('YYYY-MM-DD[T]HH[:]mm'));
                    $('#input-category-id').val(meeting.category_id);
                    $('#input-meeting-type-id').val(meeting.meeting_type_id);
                    $('#input-url').val(meeting.url);
                    $('#input-meeting-password').val(meeting.meeting_password);
                    $('#input-duration').val(moment.utc(meeting.duration).format('HH[:]mm'));
                    $('#input-is-published').val(meeting.is_published);
                }
                else {
                    $('#saveModalTitle').text('Create Meeting');

                    //Reset Form
                    $('#input-id').val(null);
                    $('#input-title').val(null);
                    $('#input-description').val(null);
                    $('#input-meeting-id').val(null);
                    $('#input-start-at').val(null);
                    $('#input-category-id').val(null);
                    $('#input-meeting-type-id').val(null);
                    $('#input-url').val(null);
                    $('#input-meeting-password').val(null);
                    $('#input-duration').val(null);
                    $('#input-is-published').val(1);
                }
            }
        },
        closeSaveModal() {
            if ($('body').hasClass('overflow-hidden')) {
                $('body').removeClass('overflow-hidden');
            }
            this.saveModalOpen = false;
        },
        openDeleteConfirmModal(id) {
            if (!$('body').hasClass('overflow-hidden')) {
                $('body').addClass('overflow-hidden');
                this.deleteConfirmModalOpen = true;
                $('#deleteForm').attr('action', this.currentUrl + `/meeting/${id}`);
            }
        },
        closeDeleteConfirmModal() {
            if ($('body').hasClass('overflow-hidden')) {
                $('body').removeClass('overflow-hidden');
            }
            this.deleteConfirmModalOpen = false;
        },
        openDetailModal(id) {
            if (!$('body').hasClass('overflow-hidden')) {
                $('body').addClass('overflow-hidden');
                this.detailModalOpen = true;
                meeting = this.meetings.find(meeting => meeting.id == id);

                $('#meeting-image').attr('src', `${meeting.image_url}`);
                $('#meeting-title').text(meeting.title);

                profileImage = meeting.user.image?.url || this.defaultProfileUrl;
                $('#meeting-host-profile').attr('src', `${profileImage}`);
                $('#meeting-host-name').text(meeting.user.name);

                $('#meeting-category').text(meeting.category.name);
                $('#meeting-description').text(meeting.description);
                $('#meeting-type').text(meeting.meeting_type.name);

                if (meeting.meeting_id) {
                    if ($('#meeting-id').closest('div').hasClass('hidden')) {
                        $('#meeting-id').closest('div').removeClass('hidden');
                    }
                    $('#meeting-id').text(meeting.meeting_id);
                } else {
                    $('#meeting-id').closest('div').addClass('hidden');
                }

                if (meeting.meeting_password) {
                    if ($('#meeting-password').closest('div').hasClass('hidden')) {
                        $('#meeting-password').closest('div').removeClass('hidden');
                    }
                    $('#meeting-password').text(meeting.meeting_password);
                } else {
                    $('#meeting-password').closest('div').addClass('hidden');
                }
                $('#meeting-time').text(moment.utc(meeting.start_at).format('LLLL'));
                $('#meeting-duration').text(moment.utc(meeting.duration).format('H [Hours] m [Minutes]'));
                $('#meeting_url').attr('href', `${meeting.url}`);
            }
        },
        closeDetailModal() {
            if ($('body').hasClass('overflow-hidden')) {
                $('body').removeClass('overflow-hidden');
            }
            this.detailModalOpen = false;
        },
    }));
});
