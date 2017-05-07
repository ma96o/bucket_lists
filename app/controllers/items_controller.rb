class ItemsController < ApplicationController
  layout 'application_prof'

  before_action :get_user, only: %i(index success)
  before_action :get_list, only: %i(index)

  def index
    @lists = @user.lists
    @items = @list.items
  end

  def success
    @items = @user.items.where('status = ?', 2)
  end

  private
    def get_user
      @user = User.find(params[:user_id])
    end

    def get_list
      @list = List.find(params[:list_id])
    end
end
