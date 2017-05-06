class ItemsController < ApplicationController
  layout 'application_prof'

  def index
    @user = User.find(params[:user_id])
    @list = List.find(params[:list_id])
    @lists = @user.lists
    @items = @list.items
  end
end
